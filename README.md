# Examen

## Create cluster

kind create cluster

## Instantiate the db clusterset

kubectl apply -f database/postgres.yml

## Instantiate the deployments for backend and frontend

kubectl apply deployment.yml

## How to build the source for the backend

First make the venv

cd .\backend\

python -m venv .venv

Then install dependencies:

pip install --no-cache-dir -r requirements.txt
