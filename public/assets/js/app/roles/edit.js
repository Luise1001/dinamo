let form = document.getElementById('edit_role');
let input = document.createElement('input');

input.type = 'hidden';
input.name = 'permissions';
form.appendChild(input);

function permission(e, permission_id) {
    if (e.checked) {
        if (!list_permissions.includes(permission_id)) {
            list_permissions.push(permission_id);
        }
    } else {
        list_permissions = list_permissions.filter(permission => permission !== permission_id);
    }

    input.value = JSON.stringify(list_permissions);
}

input.value = JSON.stringify(list_permissions);