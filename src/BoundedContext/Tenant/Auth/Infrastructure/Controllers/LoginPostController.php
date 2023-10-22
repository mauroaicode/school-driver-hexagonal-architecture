<?php

namespace Core\BoundedContext\Tenant\Auth\Infrastructure\Controllers;

use Throwable;
use Illuminate\Http\JsonResponse;
use Core\Shared\Infrastructure\Controllers\AppBaseController;
use Core\BoundedContext\Tenant\Auth\Application\Actions\AuthenticateUser;
use Core\BoundedContext\Tenant\Auth\Infrastructure\{FormRequest\AuthRequest, Persistence\AuthRepository};

class LoginPostController extends AppBaseController
{

    public function __construct(private AuthRepository $authRepository){}

    /**
     * Handles login requests and responds with a JSON response.
     *
     * @param AuthRequest $request The login request.
     * @return JsonResponse A successful or error JSON response.
     */
    public function __invoke(AuthRequest $request): JsonResponse
    {
        try {
            $credentials = $request->only(['email', 'password']);

            $authUserData = (new AuthenticateUser(
                $this->authRepository,
            ))(
                $credentials
            );

            return $this->sendSuccess($authUserData);

        } catch (Throwable $th) {

            return $this->sendError($th->getMessage(), $th->getCode());
        }
    }
}
