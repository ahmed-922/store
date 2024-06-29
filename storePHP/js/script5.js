function showall() {
    document.getElementById('all').style.display = 'flex';
    document.getElementById('electronics').style.display = 'none';
    document.getElementById('food').style.display = 'none';
    document.getElementById('admin').style.display = 'none';
    document.getElementById('additem').style.display = 'none';
}

function showfood() {
    document.getElementById('all').style.display = 'none';
    document.getElementById('electronics').style.display = 'none';
    document.getElementById('food').style.display = 'flex';
    document.getElementById('admin').style.display = 'none';
    document.getElementById('additem').style.display = 'none';
}

function showelec() {
    document.getElementById('all').style.display = 'none';
    document.getElementById('electronics').style.display = 'flex';
    document.getElementById('food').style.display = 'none';
    document.getElementById('admin').style.display = 'none';
    document.getElementById('additem').style.display = 'none';
}

function showadmin() {
    document.getElementById('all').style.display = 'none';
    document.getElementById('electronics').style.display = 'none';
    document.getElementById('food').style.display = 'none';
    document.getElementById('admin').style.display = 'flex';
}





function createStaff() {
    document.getElementById('Cstaff').style.display = 'flex';
    document.getElementById('Dstaff').style.display = 'none';
    document.getElementById('Minv').style.display = 'none';
}
function deleteStaff() {
    document.getElementById('Cstaff').style.display = 'none';
    document.getElementById('Dstaff').style.display = 'flex';
    document.getElementById('Minv').style.display = 'none';
}




function addItems() { 
    document.getElementById('additem').style.display = 'flex';
}