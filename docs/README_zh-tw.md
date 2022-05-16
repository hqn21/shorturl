# shorturl
[English](https://github.com/hqn21/shorturl/blob/main/README.md) | 繁體中文
## 關於專案
此專案是一個利用唯一代號縮短網址的工具。
### 使用資源
* jQuery
* Bootstrap
### 檔案結構
```
shorturl/
├── index.php
└── shorturl.php
```
### 資料表結構
url

|    名稱     |     類型     | 編碼 | 預設值 |            意義             |
|--------------|--------------|----------|---------|--------------------------------|
| unique_id    | varchar(200) | utf8_bin | N/A     | 辨識轉址之 URL |
| original_url | varchar(200) | utf8_bin | N/A     | 唯一代號的轉址目標    |

allow_ipaddress

|   Index   |    Type     | Encoding | Default |                      Meaning                      |
|-----------|-------------|----------|---------|---------------------------------------------------|
| ipaddress | varchar(32) | utf8_bin | N/A     | 允許進入管理頁面的 IPv4 地址 |

## 開始部屬
跟隨指示以在本地端部屬此專案。
### 事先準備
* Apache
* PHP 7.2
* JavaScript ES6
### 安裝步驟
1. 複製此 repo
   ```sh
   git clone https://github.com/hqn21/shorturl.git
   ```
2. 利用上方提到的資訊創建資料表
3. 在 `index.php` 和 `shorturl.php` 中輸入您的 MySQL 伺服器資訊
   ```php
   $mysql = mysqli_connect('HOSTNAME', 'USERNAME', 'PASSWORD', 'DATABASE');
   ```
## License
根據 MIT License 發布，查看 [LICENSE](https://github.com/hqn21/shorturl/blob/main/LICENSE) 以獲得更多資訊。
## Contact
劉顥權 Haoquan Liu - [contact@haoquan.me](mailto:contact@haoquan.me)

Project Link: [https://github.com/hqn21/shorturl/](https://github.com/hqn21/shorturl/)
