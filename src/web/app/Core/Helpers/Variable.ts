export default class Variable {
    public static empty(variable) {
        return variable === null
            || variable === false
            || variable === undefined
            || (variable instanceof Array && variable.length === 0)
            || (typeof variable === 'string' && variable.length === 0)
            || (typeof variable === 'number' && variable === 0)
            || (typeof variable === 'object' && Object.keys(variable).length === 0);

    }

    public static notEmpty(variable) {
        return !this.empty(variable);
    }
}
