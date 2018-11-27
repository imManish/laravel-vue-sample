<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use ReflectionException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    //#ErrorException

    public function apiException($request, $e)
    {
        if ($this->isModel($e)) {
            return $this->modelResponse($e);
        }
        if ($this->isHttp($e)) {
            return $this->httpResponse($e);
        }
        if ($this->isMethod($e)) {
            return $this->httpMethod($e);
        }
        if ($this->isReflection($e)) {
            return $this->httpReflection($e);
        }

        return parent::render($request, $e);
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function isMethod($e)
    {
        return $e instanceof MethodNotAllowedHttpException;
    }

    protected function isReflection($e)
    {
        return $e instanceof ReflectionException;
    }

    protected function modelResponse($e)
    {
        return response()->json(
            [
            'success' => false,
            'code' => Response::HTTP_NOT_FOUND,
            'errors' => [
                'message' => 'This Model Not Found!',
            ],
            ],
            Response::HTTP_NOT_FOUND
        );
    }

    protected function httpResponse($e)
    {
        return response()->json(
            [
            'success' => false,
            'code' => Response::HTTP_NOT_FOUND,
            'errors' => [
                'message' => 'This Route Not Found!',
            ],
            ],
            Response::HTTP_NOT_FOUND
        );
    }

    protected function httpMethod($e)
    {
        return response()->json(
            [
            'success' => false,
            'code' => Response::HTTP_NOT_FOUND,
            'errors' => [
                'message' => 'Route Method Not Found!',
            ],
            ],
            Response::HTTP_NOT_FOUND
        );
    }

    protected function httpReflection($e)
    {
        return response()->json(
            [
            'success' => false,
            'code' => Response::HTTP_NOT_FOUND,
            'errors' => [
                'message' => 'Route ReflectionMethod Not Found!',
            ],
            ],
            Response::HTTP_NOT_FOUND
        );
    }
}
