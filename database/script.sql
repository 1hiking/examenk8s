CREATE TABLE todo (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    is_done BOOLEAN DEFAULT FALSE
);

INSERT INTO todo (title, description)
VALUES
    ('Learn SQL', 'Master the art of querying data'),
    ('Build a Web App', 'Create a full-stack application'),
    ('Read a Book', 'Dive into a captivating story'),
    ('Exercise Daily', 'Stay fit and healthy'),
    ('Learn a New Language', 'Expand your horizons');