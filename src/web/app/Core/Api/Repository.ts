import Env from "../Helpers/Env";
import Variable from "../Helpers/Variable";
import {Endpoint} from "./Endpoint";

export default abstract class Repository {
    protected static mountFullUrl(
        relative_path: Endpoint,
        binds: Array<string | number> = []
    ): string {
        let full_url = Env.apiBaseUrl();
        let string_relative_path: string = relative_path.toString();

        if (full_url.endsWith('/')) {
            full_url = full_url.slice(0, -1);
        }

        if (string_relative_path.startsWith('/')) {
            string_relative_path = string_relative_path.slice(1);
        }

        if (Variable.notEmpty(binds)) {
            const bindMarker: string = this.bindMarker();

            binds.forEach((bind: string) => {
                string_relative_path = string_relative_path.replace(bindMarker, bind);
            });
        }

        return `${full_url}/${string_relative_path}`;
    }



    public static bindMarker(): string {
        return '$BIND_MARKER';
    }
}
