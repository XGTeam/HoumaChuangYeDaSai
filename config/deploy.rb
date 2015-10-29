# config valid only for current version of Capistrano
lock '3.4.0'

set :application, 'hou_ma_chuang_ye_da_sai'
set :repo_url, 'https://github.com/XGTeam/HoumaChuangYeDaSai.git'

role :web, %w{ypjh.com.cn}

set :file_permissions_paths, [
  'storage',
  'storage/framework/cache',
  'storage/framework/sessions',
  'storage/framework/views'
]
set :file_permissions_users, ['www']

set :linked_dirs, %w{public/system}

namespace :deploy do

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end
