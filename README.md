# Post-Article
This source code is a small scale project in the case of the CRUD post article.

# Application Environment
| Environment | Version |
| ----------- | ----------- |
| MariaDB | - |
| PHP | 8.1.6 |
| Codeigniter | 3.1.13 |

# Features
- Menu Posts: All Posts, Add New and Preview.
- All Posts Tabs: Published, Drafts and Trashed.
- Each tab has a table containing title, category & action. This action contains an edit icon and a trash icon.

# Themes and Library Support
- CORE UI
- Rest Server by https://github.com/chriskacerguis/codeigniter-restserver

# Security
Prevent:
- SQL Injection
- XSS
- CSRF
- IDOR

# API endpoint
| API |
| ----------- |
| api/article |
| api/article/(request_by_id) |
| api/article/update/(request_by_id) |
| api/article/delete/(request_by_id) |

# Installation
- Clone repository
- Setting config database from folder application/config/database.php
```
'hostname' => 'localhost',
'username' => 'your_username',
'password' => 'your_password',
'database' => 'your_database_name',
```
- Import database from folder download_sql/DB_PostArticle.sql

# Screenshots
1. All Posts
<img width="1512" alt="All_Posts" src="https://user-images.githubusercontent.com/60000779/187086483-1b045c3e-cd40-48b5-a0c5-0bbbbff140aa.png">

2. Modal Post Edit
<img width="1512" alt="Modal_Edit" src="https://user-images.githubusercontent.com/60000779/187086561-04f99973-c02a-49a6-b8bc-125041cb93ed.png">

3. Add New
<img width="1512" alt="Add_New" src="https://user-images.githubusercontent.com/60000779/187086518-457aa7d2-e1c4-4332-a6e8-29ab3566e173.png">

4. Preview
<img width="1512" alt="Preview" src="https://user-images.githubusercontent.com/60000779/187086523-c8db8e13-250b-4469-b6ca-bc2abd9b01f6.png">

5. Post Page
<img width="1512" alt="Post_Page" src="https://user-images.githubusercontent.com/60000779/187086529-7a081028-1007-4b60-9bef-00519b184a7d.png">
