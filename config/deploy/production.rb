server 'ypjh.com.cn', user: 'www', roles: %w{web}

namespace :deploy do
  desc "Upload production environment"
  task :put_env do
    on roles(:web) do
      upload! './.env.production', "#{release_path}/.env"
    end
  end

  desc "Cache configuration"
  task :cache_config do
    on roles(:web) do
      within release_path do
        execute :php, :artisan, 'config:cache'
      end
    end
  end

  desc "Cache route"
  task :cache_route do
    on roles(:web) do
      within release_path do
        execute :php, :artisan, 'route:cache'
      end
    end
  end

  desc "Gulp production"
  task :gulp do
    on roles(:web) do
      within release_path do
        execute :gulp, '--production'
      end
    end
  end

  desc "App installation"
  task :app_install do
    on roles(:web) do
      within release_path do
        execute :php, :artisan, 'app:install'
      end
    end
  end
end

before 'deploy:updated', :put_env

after  'deploy:updated', 'deploy:gulp'
after  'deploy:updated', 'deploy:app_install'
after  'deploy:updated', 'deploy:cache_config'
after  'deploy:updated', 'deploy:cache_route'
