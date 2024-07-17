const arrStocks = 
[
    {
        itemName: "Bag",
        price: 450,
        date:"09-19-2023",
        soldItems: 8,
        RemainStocks:154
    },
    {
        itemName: "Shoes",
        price: 300,
        date: "09-19-2023",
        soldItems: 3,
        RemainStocks:331
    },
    {
        itemName: "Sandals",
        price: 500,
        date: "09-19-2023",
        soldItems: 7,
        RemainStocks:714
    }
]

function renderStocks(){
    let htmlIncrementor = '';
    for(let i = 0; i < arrStocks.length; i++){
    let getStocks = arrStocks[i];
    const{itemName,price,date,soldItems,RemainStocks} = getStocks;
    //calling the total ocmputing function for each looop itereation
    html = `<center><div class = 'arrStocks'> | 
    <div> Item Name: ${itemName} </div> | 
    <div> Item Price:  ${price} </div> | 
    <div> Date: ${date} </div> | 
    <div> Sold Items: ${soldItems} </div> |
    <div> Remaining Stocks: ${RemainStocks} </div> |

    <button class = "btnDelete"
    onclick = "
    arrStocks.splice(${i},1);
    renderStocks();
    "
    >Delete</button>
    </div></center>
    `
    htmlIncrementor += html;
}
document.querySelector('.outputs').innerHTML = htmlIncrementor;

}
//function to store item when button submit is clicked
function storeItem(){
    
    let hItemName, hPrice, hDate, hSoldItems;
    hItemName = document.querySelector(".itemName");
    hPrice = document.querySelector(".price");
    hDate = document.querySelector(".date");
    hSoldItems = document.querySelector(".soldItems");

    let ItemName,Price,Date,SoldItems;
    ItemName = hItemName.value;
    Price = hPrice.value;
    Date = hDate.value;
    SoldItems = hSoldItems.value;

if(ItemName ===  "" || Price === "" || Date === "" || SoldItems === "" ){
    window.alert(`ERROR: Empty Fields are prohibited`);
}else{
    arrStocks.push({
        itemName :  ItemName,
        price:  Price,
        date: Date,
        soldItems: SoldItems,
        RemainStocks: "To be Announce"
     })
 
     hItemName.value = "";
     hPrice.value = "";
     hDate.value = "";
     hSoldItems.value = "";
     renderStocks();
    }
}

function viewStocks(){
    renderStocks();
}
function total(){
    var Total = 0;

    for(let i = 0; i < arrStocks.length; i++){
        let arrayItem = arrStocks[i];
        let{price,soldItems} = arrayItem;
        Total += price * soldItems;
    }

    document.querySelector(".displayTotal").innerHTML = `Total Sales: Php ${Total}`;

}
