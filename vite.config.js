import { defineConfig } from 'vite';

export default defineConfig({
  base: './',
  build: {
    // 変更を監視して自動でビルドをかける設定
    // watch: {}, 本番公開時は消す
    // 本番公開用にファイル名などを管理するマニフェストを出力
    manifest: true,
    outDir: 'dist', // 出力先フォルダ
    rollupOptions: {
      input: {
        'main-js': 'src/main.js',
        main: 'src/main.scss',
        'front-page': 'src/front-page.scss',
        'page-cats': 'src/page-cats.scss',
        'page-menu': 'src/page-menu.scss',
        'page-news': 'src/page-news.scss',
        'page-contact': 'src/page-contact.scss',
        'page-info': 'src/page-info.scss',
        'page-notfound': 'src/page-notfound.scss',
      }, // 監視・コンパイルする主体のファイル
      output: {
        entryFileNames: 'assets/[name].js',
        chunkFileNames: 'assets/[name].js',
        assetFileNames: 'assets/[name].[ext]',
      },
    },
  },
  server: {
    // WordPress（Local）と通信するための設定
    host: 'localhost',
    cors: true,
    strictPort: true,
    port: 5173,
    hmr: {
      host: 'localhost',
    },
  },
});
