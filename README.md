# Library
Тестовое задание для компании ООО "Медкорт"
## Описание
* Приложение включает : (Авторизацию + Регистрацию), две роли : 'worker', 'reader','admin. CRUD система для книг, категорий кнги, сотрудников.Регистрация только для читателей('reader').При авторизации нового читателя на email администратора прихоидт письмо с текстом 'Новый читатель {имя нового читатлея} зарегестрирован !'. Читатлеи могу тоставлять комментарии к книге.
# Для установки есть инструкция download-project instructions.txt, файл находится в папке "covers and env file"
# Авторизация
![Main view](screenshots/log_in.png)
# Регистрация, только для читаталей, на регистрации устанавливается роль 'reader', после авторизации на почту администратора (second_em@mail.ru) приходит письмо
![Main view](screenshots/auth_for_readers.png)
![Main view](screenshots/auth_for_email_page_1.png)
![Main view](screenshots/auth_for_email_page_2.png)
# Панель управления библиотекой для роли 'worker', для сотрудников есть возможность редактировать,удалять, создавать книги и категории книг
![Main view](screenshots/dashboard_for_worker.png)
![Main view](screenshots/dashboard_for_worker_page_category_books.png)
# Панель управления библиотекой для роли 'reader', читатели могу только просматривать и комментировать книги
![Main view](screenshots/reader_dashboardpng.png)
![Main view](screenshots/comment_book.png)
# Если нет комментариев к кинге
![Main view](screenshots/null_comment_book.png)
# Панель управления библиотекой для роли 'admin', для администратора есть возможность редактировать,удалять, создавать книги и категории книг, а также CRUD для сотрудкников
![Main view](screenshots/admin_dashboard.png)
![Main view](screenshots/admin_worker_CRUD.png)
# Окно с уведомление об удалении книги
![Main view](screenshots/delete_alert_for_books.png)
# Для подпробного ознакомления установить проект по инструкции, которая была указана ранее.
