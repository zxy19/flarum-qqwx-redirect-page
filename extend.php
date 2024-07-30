<?php

/*
 * This file is part of xypp/flarum-qqwx-redirect-page.
 *
 * Copyright (c) 2024 小鱼飘飘.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Xypp\QQWxRedirect;

use Flarum\Extend;
use Xypp\QQWxRedirect\Middleware\QQWxDetect;

return [
    (new Extend\Frontend('admin'))
        ->js(__DIR__ . '/js/dist/admin.js'),
    new Extend\Locales(__DIR__ . '/locale'),
    (new Extend\View())
        ->namespace('xypp-wxqq-redirect.page', __DIR__ . '/views'),
    (new Extend\Middleware("forum"))
        ->insertAfter(\Flarum\Http\Middleware\SetLocale::class, QQWxDetect::class),
    (new Extend\Settings())
        ->default("xypp-qqwx-redirect.enable", true)
        ->default("xypp-qqwx-redirect.blockUA", "QQ/\nMicroMessenger")
];