process.env.DISABLE_NOTIFIER = true

var elixir = require('laravel-elixir');

stylesPath = 'public/assets/styles/';
scriptsPath = 'public/assets/scripts/';
bowerPath = 'vendor/bower_components/';

elixir.config.css.outputFolder = stylesPath;
elixir.config.js.outputFolder = scriptsPath;
elixir.config.sourcemaps = false;

elixir(function (mix) {
  mix.copy('resources/assets/css/bootstrap.*.min.css', stylesPath);
  mix.styles(['bootstrap.min.css'], stylesPath + 'bootstrap.default.min.css');
  mix.styles(['bootstrap.min.css', 'bootstrap-theme.min.css'], stylesPath + 'bootstrap.legacy.min.css');
  mix.styles(['bootstrap.min.css', 'agency.css'], stylesPath + 'bootstrap.agency.min.css');

  mix.styles(['cms-main.css'], stylesPath + 'cms-main.css');

  // Vendor styles
  mix.styles([
      'font-awesome/css/font-awesome.min.css',
      'animate.css/animate.min.css'
  ], stylesPath + 'vendor.min.css', bowerPath);

  // Vendor javascripts
  mix.scripts([
      'jquery/dist/jquery.min.js',
      'jquery-timeago/jquery.timeago.js',
      'classie/classie.js',
      'bootstrap/dist/js/bootstrap.min.js',
      'jqBootstrapValidation/dist/jqBootstrapValidation-1.3.7.min.js',
      'AnimatedHeader/js/cbpAnimatedHeader.min.js',
  ], scriptsPath + 'vendor.min.js', bowerPath);

  mix.scripts(['cms-timeago.js',
               'cms-restfulizer.js',
               'cms-carousel.js',
               'cms-alerts.js',
               'agency.js',
               'contact_me.js'
  ], scriptsPath + 'cms-main.js');
  mix.scripts(['cms-picker.js'], scriptsPath + 'cms-picker.js');
  mix.scripts(['cms-comment-core.js', 'cms-comment-edit.js', 'cms-comment-delete.js', 'cms-comment-create.js', 'cms-comment-fetch.js', 'cms-comment-main.js'], scriptsPath + 'cms-comment.js');
});
