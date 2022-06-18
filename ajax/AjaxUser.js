$(document).ready(function() {
    // LIST DATA Users SHOW TO TABLE
    var dataUser = $('#ShowDataUsers').DataTable({

        "lengthChange": true,
        lengthMenu: [
            [ 5, 10, 20, 30,40,50,60,70,80,90,100, -1 ],
            [ '5','10','20','30','40','50', '60', '70','80','90','100', 'All' ]
        ],
        "info": false,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'paging': true,
        'searching':true,
        'pagingType':'first_last_numbers',
        "order": [],
        "ajax": {
            url: "../actions/ActionUser.php",
            type: "POST",
            data: { ActionListUsers: 'ListDataUsers' },
            dataUser: "json"
        },
        "columnDefs": [{
            "targets": [0, 0],
            "orderable": false,
        }, ],
        
        "pageLength": 5 
    });

});
