/**
 * Created by Paulo on 04/03/2018.
 */
export default class {
    constructor(include = null){
        this.pagination = {
            current_page:0,
                per_page:0,
                total:0
        };
        this.search = '';
        this.order = {
            key:'id',
            sort:'asc'
        };
        this.include = include;
        this.limit = null;
    }

    get pagination(){
        return this._pagination;
    }
    set pagination(value){
        if(value.current_page > 0 ){
            value.current_page--;
        }
        this._pagination = value;
    }

    get order(){
        return this._order;
    }

    set order(value){
        this._order = value;
    }
    createOptions(){
        let options = {
            page: this.pagination.current_page+1,
            orderBy: this.order.key,
            sortedBy: this.order.sort,
            search: this.search
        };

        if(this.include){
            options.include = this.include;
        }
        if(this.limit){
            options.limit = this.limit;
        }
        return options;
    }
}