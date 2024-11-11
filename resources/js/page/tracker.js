class Tracker {
    constructor(pageView) {
        this.apiUrl = '/api/tracks';
        this.pageView = pageView;
    }

    async submit() {
        try {
            const fingerprintData = await this.collectBasicFingerprint();
            await this.sendData(fingerprintData);
        } catch (error) {
            console.error("Error tracking data:", error);
        }
    }

    async collectBasicFingerprint() {
        return {
            date_time: this.getDateTime(),
            user_agent: this.getBrowserName(),
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            ip: await this.getIp(),
            page_number: this.pageView.getPageNumber(),
        };
    }

    getDateTime() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }

    async getIp() {
        try {
            const response = await fetch('https://api.ipify.org?format=json');
            const data = await response.json();
            return data.ip;
        } catch (error) {
            console.error("Error fetching IP:", error);
            return '0.0.0.0';
        }
    }

    getBrowserName() {
        let browserName = "Unknown";

        if (navigator.userAgentData) {
            const uaData = navigator.userAgentData;
            browserName = uaData.brands[0].brand;
        } else {
            const ua = navigator.userAgent;

            if (ua.includes("Firefox")) {
                browserName = "Firefox";
            } else if (ua.includes("Chrome")) {
                browserName = "Chrome";
            } else if (ua.includes("Safari") && !ua.includes("Chrome")) {
                browserName = "Safari";
            } else if (ua.includes("Edge")) {
                browserName = "Edge";
            } else if (ua.includes("OPR") || ua.includes("Opera")) {
                browserName = "Opera";
            }
        }

        return browserName;
    }

    async sendData(data) {
        try {
            await fetch(this.apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
        } catch (error) {
            console.error("Error sending data:", error);
        }
    }
}