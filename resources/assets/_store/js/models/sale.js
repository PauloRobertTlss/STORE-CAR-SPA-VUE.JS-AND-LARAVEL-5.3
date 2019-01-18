
const formattedLines = (lines,lineCollection = []) =>{
    for(let b of lines){
        let lineNew = {
            units : b.units,
            product_id : b.product.data.cid
        };
        lineCollection.push(lineNew);
    }
    return lineCollection;
};
export default class {
    constructor(data ={}){
        this.init();
        Object.assign(this,data);
    }

    init(){
        this.is_customer = false;
        this.is_lines = false;
        this.customer ={name:null};
        this.contacts = [];
        this.address = {route:null,number:null,neibohold:null,city:null};
        this.lines = [];
    }

    toJSON(){
        let o = {
            customer: this.customer,
            address: this.address,
            contacts: this.contacts,
            lines: formattedLines(this.lines.data)
        };
        return o;

    }

}
