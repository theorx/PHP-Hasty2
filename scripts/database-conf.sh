#!/bin/bash

case "$1" in
        create)
                cd ./../
                echo "Dropping existing database if exists"
                php ./vendor/bin/doctrine orm:schema-tool:drop --force
                echo "Creating new schema to database"
                php ./vendor/bin/doctrine orm:schema-tool:create
            ;;
        update)
                cd ./../
                echo "Updating database schema"
                php ./vendor/bin/doctrine orm:schema-tool:update --force
            ;;
        *)
            echo $"Usage: $0 {create|update}"
            exit 1
esac

