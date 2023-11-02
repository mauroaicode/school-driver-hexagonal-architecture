<?php

namespace Core\BoundedContext\Admin\Auth\Infrastructure\Controllers;

use Throwable;
use Illuminate\Http\JsonResponse;
use Core\Shared\Infrastructure\Controllers\AppBaseController;
use Core\BoundedContext\Admin\Auth\{Application\Actions\LogoutUseCase, Infrastructure\Persistence\AuthJwtRepository};

class LogoutPostController extends AppBaseController
{
    public function __construct(private AuthJwtRepository $authRepository){}

    /**
     * Logs out the current user and returns a confirmation message.
     *
     * @return JsonResponse The JSON response containing a confirmation message and HTTP status code.
     */
    public function __invoke(): JsonResponse
    {
        try {

            $logoutResponse = (new LogoutUseCase($this->authRepository))();

            return $this->sendSuccess($logoutResponse);

        } catch (Throwable $th) {

            return $this->sendError($th->getMessage(), $th->getCode());
        }
    }
}
