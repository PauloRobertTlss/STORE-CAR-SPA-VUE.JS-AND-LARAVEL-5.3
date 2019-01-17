/**
 * Created by Paulo on 05/01/2018.
 */
export default {
    set(key,value){
        window.localStorage[key] = value;
        return window.localStorage[key];
        //window.localStorage.setItem(key,value); Mesmo ação
    },
    get(key,defaultValue = null){
        return window.localStorage[key] || defaultValue;
    },
    setObject(key,value){
        window.localStorage[key] = JSON.stringify(value);
        return this.getObject(key);
    },
    getObject(key){
        return JSON.parse(window.localStorage[key] || null);
    },
    remove(key){
        window.localStorage.removeItem(key);
    }
}