var item = [];

function buyimmediatly(picture, id, name, id_user, price) {
   var testObject = {'picture':picture, 'id': id, 'name': name, 'id_user': id_user, 'price':price, 'quantity':1};
   item.push(testObject);
   localStorage.setItem('item', JSON.stringify(item));
}