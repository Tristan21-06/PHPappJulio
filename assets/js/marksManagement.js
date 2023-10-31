function buildStudents(json){
    let html = "";

    json.objects.forEach(student => {

        html += "<tr>";
        html += `<td>${student.name}</td>`;
        html += `<td>${student.lastname}</td>`;
        html += `<td>${student.average}</td>`;
        html += `<td>`;
        html += `<a href="/?page=detailsMarks&student=1">`;
        html += `<span class="material-icons">`;
        html += `edit`;
        html += `</span>`;
        html += `</a>`;
        html += `</td>`;
        html += "</tr>";

    });

    $('#datatable-body').html(html);

    displayDatatable();
}

$.ajax({
    url: "/includes/ajax/getData.php",
    data: sendData,
    success: function(result){
        jsonObjects = JSON.parse(result);
        buildStudents(jsonObjects);
    }
});