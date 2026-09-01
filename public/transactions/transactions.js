function transaction(id){
    fetch('delete.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            alert(data.message)
        })
}
