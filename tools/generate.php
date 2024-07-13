<?php

use WyriHaximus\FakePHPVersion\Versions;

use function WyriHaximus\Twig\render;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => [
            'User-Agent: PHP'
        ]
    ]
]);
$versions = json_decode(file_get_contents('https://api.github.com/repos/php/php-src/tags', false, $context));

foreach ($versions as $version) {
    if (strpos($version->name, 'php-') === 0) {
        if (0 !== preg_match('/(\d+\.?)+$/', $version->name, $matches)) {
            $shouldBe3 = explode('.', $matches[0]);
            if (count($shouldBe3) === 3) {
                $actualVersion = implode('.', $shouldBe3);

                if (Versions::ACTUAL === $actualVersion) {
                    echo 'No new version detected, better luck next time!', PHP_EOL;
                    exit(2);
                }

                $constantFutureVersion = explode('.', Versions::FUTURE);
                $futureVersion = $shouldBe3;
                $futureVersion[0]++;
                if ($futureVersion[0] === $shouldBe3[0]) {
                    $futureVersion[1] = $shouldBe3[1];
                    $futureVersion[2] = $shouldBe3[2];
                }
                $futureVersion[1] *= random_int(1, 5);
                $futureVersion[1] += $constantFutureVersion[1];
                $futureVersion[2] *= random_int(1, 5);
                $futureVersion[2] += $constantFutureVersion[1];
                $futureVersion = implode('.', $futureVersion);

                $constantCurrentVersion = explode('.', Versions::CURRENT);
                $currentVersion = $shouldBe3;
                if ($currentVersion[0] !== $shouldBe3[0]) {
                    $currentVersion[0]++;
                    $currentVersion[1] = $shouldBe3[1];
                    $currentVersion[2] = $shouldBe3[2];
                }
                $currentVersion[1] *= random_int(1, 5);
                $currentVersion[1] += $constantCurrentVersion[1];
                $currentVersion[2] *= random_int(1, 5);
                $currentVersion[2] += $constantCurrentVersion[1];
                $currentVersion = implode('.', $currentVersion);

                echo 'Writing new versions file!', PHP_EOL;
                echo 'Actual: ', $actualVersion, PHP_EOL;
                echo 'Future: ', $futureVersion, PHP_EOL;
                echo 'Current: ', $currentVersion, PHP_EOL;

                if (strlen(getenv('GITHUB_REF')) > 0) {
                    echo '::set-output name=future::', $futureVersion, PHP_EOL;
                    echo '::set-output name=current::', $currentVersion, PHP_EOL;
                    echo '::set-output name=actual::', $actualVersion, PHP_EOL;
                }

                file_put_contents(
                    dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'versions.php',
                    render(
                        file_get_contents(
                            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'versions.php.twig',
                        ),
                        [
                            'future' => $futureVersion,
                            'current' => $currentVersion,
                            'actual' => $actualVersion,
                        ]
                    ),
                );
                file_put_contents(
                    dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Versions.php',
                    render(
                        file_get_contents(
                            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'Versions.php.twig',
                        ),
                        [
                            'future' => $futureVersion,
                            'current' => $currentVersion,
                            'actual' => $actualVersion,
                        ]
                    ),
                );
                exit(0);
            }
        }
    }
}

echo 'No correct version detected, better luck next time!', PHP_EOL;
exit(1);
