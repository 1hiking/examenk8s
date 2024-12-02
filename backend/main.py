from flask import Flask, jsonify, request
from flask_sqlalchemy import SQLAlchemy
import os
app = Flask(__name__)


username = os.environ["PG_USER"]
password = os.environ["PG_PASS"]
url = os.environ["DB_URL"]
scheme = os.environ["DB_SCHEME"]

# Configure the PostgreSQL database
app.config['SQLALCHEMY_DATABASE_URI'] = f'postgresql://{username}:{password}@{url}/{scheme}'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

# Define the model
class Todo(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(100), nullable=False)
    description = db.Column(db.Text, nullable=True)
    is_done = db.Column(db.Boolean, default=False)

    def to_dict(self):
        return {
            "id": self.id,
            "title": self.title,
            "description": self.description,
            "is_done": self.is_done
        }

# Routes
@app.route('/todos', methods=['GET'])
def get_all_todos():
    todos = Todo.query.all()
    return jsonify([todo.to_dict() for todo in todos])

@app.route('/todos/<int:todo_id>', methods=['GET'])
def get_todo(todo_id):
    todo = Todo.query.get(todo_id)
    if not todo:
        return jsonify({"error": "Todo not found"}), 404
    return jsonify(todo.to_dict())



if __name__ == '__main__':
    app.run(debug=True, host="0.0.0.0")
