document.addEventListener('DOMContentLoaded', function() {
   const tableSearchFields = document.querySelectorAll('.tableSearch');

    tableSearchFields.forEach(field => {
        const target = field.getAttribute('target');
        const table = document.querySelector(`#${target}`);

        field.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const rows = table.querySelectorAll('tbody tr');
            const headings = table.querySelectorAll('thead tr th');
            const tableBody = table.querySelector('tbody');
            const numberOfHeadings = headings.length;

            // Remove existing "no records" row before filtering
            const existingNoRecords = tableBody.querySelector('.no-records');
            if (existingNoRecords) existingNoRecords.remove();

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });

            const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
            
            if(visibleRows.length === 0) {
                const row = `<tr class="no-records">
                    <td colspan="${numberOfHeadings}"> No Records Found </td>
                </tr>`;
          
                tableBody.innerHTML += row;
            } else {
                const noRecordsRow = tableBody.querySelector('.no-records');
                if(noRecordsRow) noRecordsRow.remove();
            }
        });

    });
});