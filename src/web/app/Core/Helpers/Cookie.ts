export default class Cookie {
    public static get(key: string, defaultValue: any = null) {
        const cookies: string = document.cookie;
        let splitCookies: Record<string, string | number | boolean> = {};

        cookies.split(';').forEach((cookie: string) => {
            const splitCookie: Array<string> = cookie.trim().split('=');

            if (splitCookie.length === 1 && 0 in splitCookie) {
                splitCookies[splitCookie[0]] = true;
            } else if (splitCookie.length === 2 && 0 in splitCookie && 1 in splitCookie) {
                splitCookies[splitCookie[0]] = splitCookie[1];
            }
        });

        return key in splitCookies ? splitCookies[key] : defaultValue;
    }

    public static set(
        key: string,
        value: string | number | boolean | null = null,
        expiresAt: Date | null = null,
        path: string = '/'
    ): void {
        let cookieString = `${key}=${value ?? ''};path=${path};`

        if (expiresAt instanceof Date) {
            cookieString += `expires=${expiresAt.toUTCString()};`;
        }

        document.cookie = cookieString;
    }

    public static delete(key: string): void {
        this.set(key, null, new Date);
    }
}