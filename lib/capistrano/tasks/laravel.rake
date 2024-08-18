namespace :deploy do
  before :updated, :composer do
    on roles(:app) do
      within release_path do
        execute :composer, "install", "--no-dev"
        execute :npm, "install"
        execute :npm, "run", "build"
      end
    end
  end

  after :updated, :migrate do
    on roles(:app) do
      within release_path do
        execute :php, "artisan", "migrate", "--force"
      end
    end
  end

  after :published, :clear_cache do
      on roles(:app) do
          within current_path do
        execute :php, "artisan", "storage:link"
        execute :php, "artisan", "cache:clear"
        execute :php, "artisan", "optimize:clear"
        execute :php, "artisan", "optimize"
        end
      end
  end
end
