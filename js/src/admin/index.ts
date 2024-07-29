import app from 'flarum/admin/app';

app.initializers.add('xypp/flarum-qqwx-redirect-page', () => {
  app.extensionData.for('xypp-qqwx-redirect-page')
    .registerSetting({
      setting: 'xypp-qqwx-redirect.enable',
      type: 'boolean',
      label: app.translator.trans('xypp-qqwx-redirect-page.admin.enable'),
    }).registerSetting({
      setting: 'xypp-qqwx-redirect.regex',
      type: 'boolean',
      label: app.translator.trans('xypp-qqwx-redirect-page.admin.enableRegex'),
    }).registerSetting({
      setting: 'xypp-qqwx-redirect.blockUA',
      type: 'textarea',
      label: app.translator.trans('xypp-qqwx-redirect-page.admin.blockUa'),
    }).registerSetting({
      setting: 'xypp-qqwx-redirect.pardonRegex',
      type: 'boolean',
      label: app.translator.trans('xypp-qqwx-redirect-page.admin.enableRegexPardon'),
    }).registerSetting({
      setting: 'xypp-qqwx-redirect.pardonUrl',
      type: 'textarea',
      label: app.translator.trans('xypp-qqwx-redirect-page.admin.urlPardon')
    });
});
