$(document).ready(function() {

    // LIST DATA Employee SHOW TO TABLE
    var dataEmployee = $('#ShowDataEmployees').DataTable({

        lengthChange: true,
        lengthMenu: [
            [ 5, 10, 20, 30,40,50,60,70,80,90,100, -1 ],
            [ '5','10','20','30','40','50', '60', '70','80','90','100', 'All' ]
        ],
        
        info: false,
        processing: true,
        serverSide: true,
        processing: true,
        serverSide: true,
        serverMethod: 'post',
        paging: true,
        searching:true,
        pagingType:'first_last_numbers',
        order: [],
        pageLength: 5,
        ajax: {
            url: "../actions/Employee.php",
            type: "POST",
            data: { ListDataEmployees: 'ListDataEmployees' },
            dataUser: "json"
        },
    });
});
