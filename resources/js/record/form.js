class DateFormHandler {
    constructor(formId, view) {
        this.form = document.getElementById(formId);
        this.form.addEventListener('submit', (event) => this.handleSubmit(event));
        this.view = view;
        this.apiURL = 'api/tracks';
    }

    formatDateTime(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');
        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }

    async handleSubmit(event) {
        event.preventDefault();
        const startDate = new Date(this.form.startDate.value);
        const endDate = new Date(this.form.endDate.value);

        const formattedStartDate = this.formatDateTime(startDate);
        const formattedEndDate = this.formatDateTime(endDate);

        const startDateToSend = encodeURIComponent(formattedStartDate);
        const endDateToSend = encodeURIComponent(formattedEndDate);
        const response = await fetch(`${this.apiURL}?start_date=${startDateToSend}&end_date=${endDateToSend}`, {
            method: 'GET'
        });
        
        if (response.ok) {
            const data = await response.json();
            this.view.render(data)
        } else {
            console.error("Error fetching data");
        }
    }
}