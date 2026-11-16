import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    // 変更を監視して自動でビルドをかける設定
    watch: {},
    // 本番公開用にファイル名などを管理するマニフェストを出力
    manifest: true,
    outDir: 'dist', // 出力先フォルダ
    rollupOptions: {
      input: {
        'main-js': 'src/main.js',
        main: 'src/main.scss',
        'front-page': 'src/front-page.scss',
        'page-cat': 'src/page-cat.scss',
        'page-menu': 'src/page-menu.scss',
        'page-news': 'src/page-news.scss',
      }, // 監視・コンパイルする主体のファイル
    },
  },
  server: {
    // WordPress（Local）と通信するための設定
    cors: true,
    strictPort: true,
    port: 5173,
    hmr: {
      host: 'localhost',
    },
  },
});
