


{
  "workspace": {
    "name": "API Testing",
    "type": "http"
  },
  "requests": [
    {
      "name": "Login",
      "method": "POST",
      "url": "http://localhost:8000/api/login",
      "body": {
        "type": "json",
        "raw": "{\"email\": \"\", \"password\": \"\"}"
      }
    },
    {
      "name": "Logout",
      "method": "POST",
      "url": "http://localhost:8000/api/logout",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Get Current User",
      "method": "GET",
      "url": "http://localhost:8000/api/me",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Refresh Token",
      "method": "POST",
      "url": "http://localhost:8000/api/refresh",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "List Users",
      "method": "GET",
      "url": "http://localhost:8000/api/users",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Create User",
      "method": "POST",
      "url": "http://localhost:8000/api/users",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ],
      "body": {
        "type": "json",
        "raw": "{\"name\": \"\", \"email\": \"\", \"password\": \"\"}"
      }
    },
    {
      "name": "Show User",
      "method": "GET",
      "url": "http://localhost:8000/api/users/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Update User",
      "method": "PUT",
      "url": "http://localhost:8000/api/users/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ],
      "body": {
        "type": "json",
        "raw": "{\"name\": \"New Name\"}"
      }
    },
    {
      "name": "Delete User",
      "method": "DELETE",
      "url": "http://localhost:8000/api/users/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "List Competitions",
      "method": "GET",
      "url": "http://localhost:8000/api/competitions",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Create Competition",
      "method": "POST",
      "url": "http://localhost:8000/api/competitions",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ],
      "body": {
        "type": "json",
        "raw": "{\"name\": \"New Competition\"}"
      }
    },
    {
      "name": "Show Competition",
      "method": "GET",
      "url": "http://localhost:8000/api/competitions/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Update Competition",
      "method": "PUT",
      "url": "http://localhost:8000/api/competitions/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ],
      "body": {
        "type": "json",
        "raw": "{\"name\": \"Updated Competition\"}"
      }
    },
    {
      "name": "Delete Competition",
      "method": "DELETE",
      "url": "http://localhost:8000/api/competitions/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "List Articles",
      "method": "GET",
      "url": "http://localhost:8000/api/articles",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Create Article",
      "method": "POST",
      "url": "http://localhost:8000/api/articles",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ],
      "body": {
        "type": "json",
        "raw": "{\"title\": \"Article Title\", \"content\": \"Article content...\"}"
      }
    },
    {
      "name": "Show Article",
      "method": "GET",
      "url": "http://localhost:8000/api/articles/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Update Article",
      "method": "PUT",
      "url": "http://localhost:8000/api/articles/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ],
      "body": {
        "type": "json",
        "raw": "{\"title\": \"Updated Title\", \"content\": \"Updated content...\"}"
      }
    },
    {
      "name": "Delete Article",
      "method": "DELETE",
      "url": "http://localhost:8000/api/articles/1",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "List Notifications",
      "method": "GET",
      "url": "http://localhost:8000/api/notifications",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Mark Notification as Read",
      "method": "PUT",
      "url": "http://localhost:8000/api/notifications/1/read",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    },
    {
      "name": "Mark All Notifications as Read",
      "method": "PUT",
      "url": "http://localhost:8000/api/notifications/read-all",
      "headers": [
        { "name": "Authorization", "value": "Bearer YOUR_TOKEN_HERE" }
      ]
    }
  ]
}
