# shorturl
短網址網站基本架構。

## 資料庫結構

allow_ipaddress（允許訪問操作頁面的 IPv4 列表）

|    ipaddress    |
|-----------------|
| 100.100.100.100 |
| 110.110.110.110 |
| 111.111.111.111 |

url（URL 導向資訊）

| unique_id |    original_url    |
|-----------|--------------------|
| google    | https://google.com |
| yahoo     | https://yahoo.com  |
| bing      | https://bing.com   |

