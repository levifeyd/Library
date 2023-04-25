# Library
Тестовое задание для компании ООО "Медкорт"
## Описание
* Приложение включает : (Авторизацию + Регистрацию), две роли : 'worker', 'reader','admin. CRUD система для книг, категорий кнги, сотрудников.Регистрация только для читателей('reader').При авторизации нового читателя на email администратора прихоидт письмо с текстом 'Новый читатель {имя нового читатлея} зарегестрирован !'
# Для установки есть инструкция download-project instructions.txt, файл находится в папке "covers and env file"
# Авторизация
![Main view](screenshots/log in.png)
# Регистрация, только для читаталей, на регистрации устанавливается роль 'reader', после авторизации на почту администратора (second_em@mail.ru) приходит письмо
![Main view](screenshots/auth for readers.png)
![Main view](screenshots/auth for email page 1.png)
![Main view](screenshots/auth for email page 2.png)
# Панель управления библиотекой для роли 'worker', для сотрудников есть возможность редактировать,удалять, создавать книги и категории книг
![Main view](screenshots/dashboard for worker.png)
![Main view](screenshots/dashboard for worker page category books.png)
# Панель управления библиотекой для роли 'reader', читатели могу только просматривать и комментировать книги
![Main view](screenshots/reader dashboardpng.png)
![Main view](screenshots/comment.png)
# Если нет комментариев к кинге
![Main view](screenshots/null comment.png)
# Панель управления библиотекой для роли 'admin', для администратора есть возможность редактировать,удалять, создавать книги и категории книг, а также CRUD для сотрудкников
![Main view](screenshots/admin_dashboard.png)
![Main view](screenshots/admin_worker CRUD.png)
# Окно с уведомление об удалении книги
![Main view](screenshots/delete alert for books.png)