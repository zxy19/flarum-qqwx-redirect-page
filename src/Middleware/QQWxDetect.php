<?php

namespace Xypp\QQWxRedirect\Middleware;

use Flarum\Http\UrlGenerator;
use Flarum\Locale\Translator;
use Flarum\Settings\SettingsRepositoryInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Server\MiddlewareInterface;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Contracts\Filesystem\Cloud;

class QQWxDetect implements MiddlewareInterface
{
    protected SettingsRepositoryInterface $settings;
    protected \Illuminate\Contracts\View\Factory $view;
    protected Cloud $assetsFilesystem;

    public function __construct(SettingsRepositoryInterface $settings, \Illuminate\Contracts\View\Factory $view, Factory $filesystemFactory)
    {
        $this->settings = $settings;
        $this->view = $view;
        $this->assetsFilesystem = $filesystemFactory->disk('flarum-assets');
    }
    function getPageContent($siteUrl)
    {
        $baseUrl = $this->assetsFilesystem->url("extensions/xypp-qqwx-redirect-page");
        return $this->view->make('xypp-wxqq-redirect.page::redirect', ["siteUrl" => $siteUrl, "base" => $baseUrl, "assets" => $this->assetsFilesystem])->render();
    }
    public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
    {
        
        if (str_starts_with($request->getUri()->getPath(), "/assets")) {
            return $handler->handle($request);
        }
        $oBlockUA = $this->settings->get('xypp-qqwx-redirect.blockUA');
        if ($oBlockUA)
            $blockUA = explode("\n", $oBlockUA);
        else
            $blockUA = [];
        $enableBlock = $this->settings->get('xypp-qqwx-redirect.enable') ?: true;
        $regex = $this->settings->get('xypp-qqwx-redirect.regex') ?: false;
        $oPardonUrl = $this->settings->get('xypp-qqwx-redirect.pardonUrl');
        if ($oPardonUrl)
            $pardonUrl = explode("\n", $oPardonUrl);
        else
            $pardonUrl = [];
        $pardonRegex = $this->settings->get('xypp-qqwx-redirect.pardonRegex') ?: false;
        $block = false;

        if ($enableBlock) {
            $ua = $request->getHeaderLine('User-Agent');
            $url = $request->getUri()->getPath();
            foreach ($blockUA as $bua) {
                $currentOk = false;
                if ($regex)
                    $currentOk = (preg_match($bua, $ua) !== false);
                else
                    $currentOk = (strpos($ua, $bua) !== false);

                if ($currentOk) {
                    $block = true;
                    break;
                }
            }
            if ($block)
                foreach ($pardonUrl as $purl) {
                    if ($pardonRegex)
                        $currentOk = (preg_match($purl, $url) !== false);
                    else
                        $currentOk = (strpos($url, $purl) !== false);
                    if ($currentOk) {
                        $block = false;
                        break;
                    }
                }
        }
        if ($block) {
            return new HtmlResponse($this->getPageContent($request->getUri()->__tostring()));
        } else {
            return $handler->handle($request);
        }
    }
}