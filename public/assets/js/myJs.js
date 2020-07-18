function getContact(group) {
    $.ajax({
        url: "{{ url('/get') }}/" + group + "/contact",
        context: document.body
    }).done(function (result) {
        groups = JSON.parse(result);
        var view = '';
        i = 1;
        groups.forEach(function (contact) {
            view += '<tr>\
                        <th scope="row">' + i++ + '</th>\
                        <td>' + contact.name + '</td>\
                        <td>' + contact.phone + '</td>\
                        <td>' + contact.address + '</td>\
                        </tr>';
        });
        $('#contacts').html(view);
    });

}
