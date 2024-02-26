CREATE DATABASE IF NOT EXISTS issue_tracker_db;
USE issue_tracker_db;

-- Tabla de Roles de Usuarios
CREATE TABLE user_roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  active BOOLEAN NOT NULL DEFAULT TRUE,
  role_name VARCHAR(50) NOT NULL
);

-- Tabla de Usuarios
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role_id INT NOT NULL,
  active BOOLEAN NOT NULL DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES user_roles(id)
);

-- Tabla de Proyectos
CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  project_name VARCHAR(100) NOT NULL,
  description TEXT,
  active BOOLEAN NOT NULL DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de Estados de Incidencias
CREATE TABLE issue_status (
  id INT AUTO_INCREMENT PRIMARY KEY,
  active BOOLEAN NOT NULL DEFAULT TRUE,
  status_name VARCHAR(50) NOT NULL
);

-- Tabla de Prioridades de Incidencias
CREATE TABLE issue_priorities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  active BOOLEAN NOT NULL DEFAULT TRUE,
  priority_name VARCHAR(50) NOT NULL
);

-- Tabla de Incidencias
CREATE TABLE issues (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  status_id INT NOT NULL,
  priority_id INT NOT NULL,
  creator_user_id INT NOT NULL,
  assigned_user_id INT NULL,
  project_id INT NOT NULL,
  active BOOLEAN NOT NULL DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (status_id) REFERENCES issue_status(id),
  FOREIGN KEY (priority_id) REFERENCES issue_priorities(id),
  FOREIGN KEY (project_id) REFERENCES projects(id),
  FOREIGN KEY (creator_user_id) REFERENCES users(id),
  FOREIGN KEY (assigned_user_id) REFERENCES users(id)
);

CREATE TABLE issue_comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  issue_id INT NOT NULL,
  user_id INT NOT NULL,
  comment TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (issue_id) REFERENCES issues(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE issue_attachments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  issue_id INT NOT NULL,
  file_name VARCHAR(255) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  uploaded_by_user_id INT NOT NULL,
  upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (issue_id) REFERENCES issues(id),
  FOREIGN KEY (uploaded_by_user_id) REFERENCES users(id)
);

-- Configuración del sistema
INSERT INTO user_roles (role_name) VALUES ('Soporte'), ('Cliente');

INSERT INTO issue_states (state_name) VALUES ('Abierto'), ('En Proceso'), ('Cerrado');

INSERT INTO issue_priorities (priority_name) VALUES ('Baja'), ('Media'), ('Alta');
