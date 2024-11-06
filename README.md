This is a simple program that uses PHP to post a name and email from your browser to postman-echo.com/post. It will store the echoed name and email, along with your user agent/version, and trace-id in a MySQL database.

This webpage requires :
1. cURL (PHP should have cURL built in)
2. MariaDB database server
3. A internet connection duh.

Tested on :
3. Qutebrowser (Blink/QtWebEngine)
4. PHP Development server over HTTP
5. uhttpd for HTTPS
6. DNS server is 9.9.9.9 (Quad9 DNSv4)
