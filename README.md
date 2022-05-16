# shorturl
English | [繁體中文](docs/README_zh-tw.md)
## About The Project
This is an URL Shortener tool.
### Built With
* jQuery
* Bootstrap
### Project Directory Structure
```
shorturl/
├── index.php
└── shorturl.php
```
### MySQL Database Table Structure
url

|    Index     |     Type     | Encoding | Default |            Meaning             |
|--------------|--------------|----------|---------|--------------------------------|
| unique_id    | varchar(200) | utf8_bin | N/A     | Identify Which URL to Redirect |
| original_url | varchar(200) | utf8_bin | N/A     | URL Related to a Unique Id    |

allow_ipaddress

|   Index   |    Type     | Encoding | Default |                      Meaning                      |
|-----------|-------------|----------|---------|---------------------------------------------------|
| ipaddress | varchar(32) | utf8_bin | N/A     | The IPv4 Address which Allows to Enter Admin Page |

## Getting Started
Follow the instructions to set up the project locally.
### Prerequisites
* Apache
* PHP 7.2
* JavaScript ES6
### Installation
1. Clone the repo
   ```sh
   git clone https://github.com/hqn21/shorturl.git
   ```
2. Create MySQL database tables with informations mentioned above
3. Enter your MySQL Server Information in `index.php` and `shorturl.php`
   ```php
   $mysql = mysqli_connect('HOSTNAME', 'USERNAME', 'PASSWORD', 'DATABASE');
   ```
## License
Distributed under the MIT License. See [LICENSE](LICENSE) for more information.
## Contact
劉顥權 Haoquan Liu - [contact@haoquan.me](mailto:contact@haoquan.me)

Project Link: [https://github.com/hqn21/shorturl/](https://github.com/hqn21/shorturl/)
