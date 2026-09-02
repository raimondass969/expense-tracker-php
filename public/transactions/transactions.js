function deleteTransaction(id){
    fetch('delete.php?id=' + id)
        .then(response => response.json())
        .then(data => {
        if(data.success){
            document.querySelector(`#transaction-${id}`).remove();
            alert(data.message)
            return true;
        }else{
            alert(data.message)
            return false;
        }
        })
}
