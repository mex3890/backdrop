// noinspection TypeScriptValidateTypes

import {defineNuxtConfig} from "nuxt/config";

// noinspection TypeScriptUnresolvedReference
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },
  devServer: {
    host: '0.0.0.0',
    port: 3000,
  },
  modules: [
    '@nuxtjs/i18n'
  ],
  i18n: {
    locales: [
      {
        code: 'pt',
        name: 'Português',
        file: '../../locales/pt-BR.json'
      },
      {
        code: 'en',
        name: 'English',
        file: '../../locales/en-US.json'
      },
      {
        code: 'es',
        name: 'Español',
        file: '../../locales/es-ES.json'
      }
    ],
    defaultLocale: 'pt',
    detectBrowserLanguage: false,
    strategy: 'no_prefix',
  },
  runtimeConfig: {
    public: {
      apiBaseUrl: process.env['API_BASE_URL'],
      appBaseUrl: process.env['APP_BASE_URL']
    }
  }
})
