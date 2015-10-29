process.env.DISABLE_NOTIFIER = true

var elixir = require('laravel-elixir');

stylesPath = 'public/assets/styles/';
scriptsPath = 'public/assets/scripts/';
imagesPath = 'public/assets/images/';
bowerPath = 'vendor/bower_components/';

elixir.config.css.outputFolder = stylesPath;
elixir.config.js.outputFolder = scriptsPath;
elixir.config.sourcemaps = false;

elixir(function (mix) {
  mix.copy('resources/assets/css/bootstrap.*.min.css', stylesPath);
  mix.copy('resources/assets/images/', imagesPath);
  mix.styles(['bootstrap.min.css'], stylesPath + 'bootstrap.default.min.css');
  mix.styles(['bootstrap.min.css', 'bootstrap-theme.min.css'], stylesPath + 'bootstrap.legacy.min.css');
  mix.styles(['bootstrap.min.css', 'agency.css'], stylesPath + 'bootstrap.agency.min.css');

  mix.styles(['cms-main.css'], stylesPath + 'cms-main.css');
  mix.styles(['iCheck/skins/square/blue.css'], stylesPath + 'icheck-square.css', bowerPath);
  mix.styles(['bootstrap-markdown/css/bootstrap-markdown.min.css'], stylesPath + 'bootstrap-markdown.min.css', bowerPath);

  // Vendor styles
  mix.styles([
      'font-awesome/css/font-awesome.min.css',
      'animate.css/animate.min.css',
      'bootstrap-fileinput/css/fileinput.min.css',
  ], stylesPath + 'vendor.min.css', bowerPath);

  // Vendor javascripts
  mix.scripts([
      'jquery/dist/jquery.min.js',
      'jquery-timeago/jquery.timeago.js',
      'jquery-timeago/locales/jquery.timeago.zh-CN.js',
      'jquery-form/jquery.form.js',
      'bootstrap/dist/js/bootstrap.min.js',
      'bootstrap-fileinput/js/fileinput.min.js',
      'bootstrap-fileinput/js/fileinput_locale_zh.js',
      'jqBootstrapValidation/dist/jqBootstrapValidation-1.3.7.min.js',
      'classie/classie.js',
      'jquery.easing/js/jquery.easing.min.js',
      'matchHeight/jquery.matchHeight-min.js'
  ], scriptsPath + 'vendor.min.js', bowerPath);

  mix.scripts(['cms-timeago.js',
               'cms-restfulizer.js',
               'cms-carousel.js',
               'cms-alerts.js',
               'agency.js',
               'enroll.js',
  ], scriptsPath + 'cms-main.js');
  mix.scripts(['cms-picker.js'], scriptsPath + 'cms-picker.js');
  mix.scripts(['AnimatedHeader/js/cbpAnimatedHeader.min.js'], scriptsPath + 'cbpAnimatedHeader.min.js', bowerPath);
  mix.scripts(['iCheck/icheck.min.js'], scriptsPath + 'icheck.min.js', bowerPath);
  mix.scripts([
      'markdown/lib/markdown.js',
      'bootstrap-markdown/js/bootstrap-markdown.js',
      'bootstrap-markdown/locale/bootstrap-markdown.zh.js'
  ], scriptsPath + 'bootstrap-markdown.js', bowerPath);
  mix.scripts(['cms-comment-core.js', 'cms-comment-edit.js', 'cms-comment-delete.js', 'cms-comment-create.js', 'cms-comment-fetch.js', 'cms-comment-main.js'], scriptsPath + 'cms-comment.js');
});
