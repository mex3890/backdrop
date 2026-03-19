import {useRuntimeConfig} from "../../../.nuxt/imports";

export default class Env {
    public static apiBaseUrl(): string {
        return this.getRuntimeConfig().apiBaseUrl;
    }

    public static appBaseUrl(): string {
        return this.getRuntimeConfig().appBaseUrl;
    }

    private static getRuntimeConfig() {
        const {public: config} = useRuntimeConfig();
        return config;
    }
}
