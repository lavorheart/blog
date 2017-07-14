一，二期项目开发环境的搭建。
    git svn
    github 码云。

    1. 在 github 上创建一个空的仓库。

    2. 在本地linux开发环境中下载 laravel 项目。
        git init
        git add .
        git commit -m 'first version'
        git remote add origin git@github.com:kkxqlzh/php183.git
        git branch --set-upstream master origin/master
        git push -u origin master

    3. 在 window 环境做开发。
        git clone git@github.com:kkxqlzh/php183.git
        ssh-keygen -t rsa -C 'php183-2'

        composer install
        cp .env.example .env
        php artisan key:generate


------------------------------------------

常用命令 

创建控制器

php artisan make:controller AlbumController
php artisan make:controller User\Core\CoreController --resource
php artisan make:model Http\Model\adv

数据迁移
php artisan migrate  

回滚迁移
php artisan migrate:refresh

数据填充

php artisan make:seeder UsersTableSeeder

php artisan db:seed

-------------------------------------------------
自定函数
1定义自定义目录文件
2修改composer.json
"files":[
            "app/libs/function.php"
        ],
3
composer dump-autoload

十六、 文件上传
--------------------------------------------------
    //如下一个控制器中执行上传方法代码如下
    public function doUpload(Request $request)
    {
        //判断是否有上传
        if($request->hasFile("upload")){
            //获取上传信息
            $file = $request->file("upload");
            //确认上传的文件是否成功
            if($file->isValid()){
                //$picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./upload/",$filename);
                      
                return response($filename); //输出
                exit();
            }
        }
    }

    // 执行加积分
        $userdetail_add=\DB::table('userdetail')
            ->where('uid', $id)
            ->update($data);
    // 清除session
        $request->session()->forget('master');
    <!-- 解密 -->
    \Crypt::decrypt($oldpassword);  
    自动更新composer.json文件
    composer dump-autoload
    