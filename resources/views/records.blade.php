<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Records</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        #message {
            color: grey;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Records Track</h1>
    <hr/>
    <form id="dateForm">
        <label for="startDate">Start Date:</label>
        <input type="datetime-local" id="startDate" name="startDate" required>
        
        <label for="endDate">End Date:</label>
        <input type="datetime-local" id="endDate" name="endDate" required>
        
        <button type="submit">Submit</button>
    </form>
    <hr/>
    <h2>Track Data</h2>
    <div id="message" style="display: none;">Nothing to show you here</div>
    
    <table id="dataTable" style="display: none;">
        <thead>
            <tr>
                <th>Page Number</th>
                <th>Date Time</th>
                <th>Timezone</th>
                <th>IP</th>
                <th>Hash</th>
                <th>User Agent</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script src="{{ asset('js/record/view.js') }}"></script>
    <script src="{{ asset('js/record/form.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new DateFormHandler('dateForm', new TrackDataView());
        });
</script>
</body>
</html>
