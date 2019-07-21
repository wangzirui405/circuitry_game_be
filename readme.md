## 电路游戏后端

*前缀为http://47.103.100.226/circuitry_game_be/public/*



### 1. 登录注册

#### 1.1 模拟登录

| URI                                 | 备注 |
| ----------------------------------- | ---- |
| `GET` `/auth/mock_login/{user_id?}` |      |

- 响应

  ```
  //成功
  {
      "status": 0,
      "msg": "Mock Login Successfully"
  }
  ```



#### 1.2 登录

| URI                  | 备注 |
| -------------------- | ---- |
| `POST` `/auth/login` |      |

- 请求

  ```
  {
      "account": "Dr.ABC", //即用户名，不是手机号
      "password": "bbt"
  }
  ```

- 响应

  ```
  //成功
  {
      "status": 0,
      "msg": "Login Successfully"
  }
  
  //失败：status有1，2，3，分别代表用户名为空，用户不存在，用户密码不对
  {
      "status": 3,
      "msg": "Password is not correct"
  }
  ```



#### 1.3 注册

| URI                | 备注 |
| ------------------ | ---- |
| `POST` `/register` |      |

- 请求

  ```
  {
      "name": "King",  //用户名，也就是登录中的account
      "phone": "15392802843",
      "sex": 1,   //0未知，1男，2女
      "password": "bbttech"
  }
  ```

- 响应

  ```
  //成功
  {
      "status": 0,
      "msg": "Register successfully"
  }
  
  //失败：status有1，2，3，分别代表电话号已存在，用户名已存在，post过来的信息有空值
  {
      "status": 1,
      "msg": "Phone already exists"
  }
  ```



#### 1.4 退出登录

| URI                  | 备注 |
| -------------------- | ---- |
| `GET` `/auth/logout` |      |

- 响应

  ```
  //成功
  {
      "status": 0,
      "msg": "Logout Successfully"
  }
  ```





### 2. 个人

#### 2.1 查看个人基本信息

| URI                          | 备注                                              |
| ---------------------------- | ------------------------------------------------- |
| `GET` `/api/user/{user_id?}` | 默认获取已登录用户，可传入user_id获取特定用户信息 |

- 响应

  ```
  //成功
  {
      "id": 2,
      "name": "Liza Carroll",
      "sex": 1,
      "phone": "14595166313",
      "avatar": null,
      "description": "This is a test for 'description'"
  }
  
  //失败1: user_id不存在
  {
      "id": -1
  }
  
  //失败2: 未登录
  {
      "status": 401,
      "msg": "Unauthorized"
  }
  ```



#### 2.2 重名检测

| URI                        | 备注 |
| -------------------------- | ---- |
| `GET` `/check/name/{name}` |      |

- 响应

  ```
  //用户名可用
  {
      "status": 0,
      "msg": "Name is available"
  }
  
  //用户名不可用
  {
      "status": 1,
      "msg": "Name already exists"
  }
  ```



#### 2.3 重号检测

| URI                          | 备注 |
| ---------------------------- | ---- |
| `GET` `/check/phone/{phone}` |      |

- 响应

  ```
  //手机号可用
  {
      "status": 0,
      "msg": "Phone is available"
  }
  
  //手机号不可用
  {
      "status": 1,
      "msg": "Phone already exists"
  }
  ```



#### 2.4 修改个人简介

| URI                            | 备注 |
| ------------------------------ | ---- |
| `POST` `/api/user/change/info` |      |

- 请求

  ```
  {
      "name": "my_new_name", //不想改可设为null传过来
                             //如果重名，name和description都不会更新
      "description": "My description context"  //不想改可设为null传过来
  }
  ```

- 响应

  ```
  //成功
  {
      "status": 0,
      "msg": "Update information successfully"
  }
  
  //失败
  {
      "status": 1,
      "msg": "Name already exists"
  }
  ```



### 3.好友

#### 3.1 查看好友列表

| URI                      | 备注           |
| ------------------------ | -------------- |
| `GET` `/api/friend/list` | 只能获取自己的 |

- 响应

  ```
  //好友列表不为空
  [
      {
          "id": 3,
          "name": "Dr.Peng",
          "sex": 2,
          "phone": "17711601743",
          "avatar": null,
          "description": "I am testing update function"
      },
      {
          "id": 1,
          "name": "Miss Prudence Toy",
          "sex": 0,
          "phone": "13856132057",
          "avatar": null,
          "description": "This is a test for 'description'"
      }
  ]
  
  //好友列表为空
  []
  ```



#### 3.2 添加好友

| URI                                  | 备注       |
| ------------------------------------ | ---------- |
| `POST` `/api/friend/add/{friend_id}` | 通过好友id |

- 响应

  ```
  //成功
  {
      "status": 0,
      "msg": "Add friend successfully"
  }
  
  //失败1
  {
      "status": 1,
      "msg": "Friend already exists"
  }
  
  //失败2
  {
      "status": 2,
      "msg": "Friend_id is invalid"
  }
  ```



#### 3.3 删除好友

| URI                                    | 备注       |
| -------------------------------------- | ---------- |
| `GET` `/api/friend/remove/{friend_id}` | 通过好友id |

- 响应

  ```
  //成功
  {
      "status": 0,
      "msg": "Remove friend successfully"
  }
  
  //失败1
  {
      "status": 1,
      "msg": "Friend does not exists"
  }
  ```



