
class TrackDataView {
    render(data) {
        const table = document.getElementById('dataTable');
        const tbody = table.querySelector('tbody');
        const message = document.getElementById('message');

        if (data.length === 0) {
            table.style.display = 'none';
            message.style.display = 'block';
            return;
        }

        table.style.display = 'table';
        message.style.display = 'none';

        tbody.innerHTML = '';

        data.forEach(item => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${item.pageNumber}</td>
                <td>${item.datetime}</td>
                <td>${item.timezone}</td>
                <td>${item.ip}</td>
                <td>${item.hash}</td>
                <td>${item.userAgent}</td>
            `;

            tbody.appendChild(row);
        });
    }
}